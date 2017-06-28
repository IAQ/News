<?php
class news_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_news($tag)
	{
		$this->db->order_by('date','DESC');
		$query = $this->db->get($tag);
		return $query->result_array();
	}

	public function news_isExist($tag,$title)
	{
		$this->db->select('id');
		$this->db->from($tag);
		$this->db->where('title', $title);
		$query = $this->db->get();
		return $query->row();
	}
	public function save($url,$tag){

		//  加载XML内容
		ini_set('user_agent','Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1667.0 Safari/537.36');
		$content = file_get_contents($url);
		$content = $this->get_utf8_string($content);
		$dom = new DOMDocument();
		$dom->loadXML($content);
		$items = $dom->getElementsByTagName("item");  
		foreach ($items as $item) {

			$link = $item->getElementsByTagName("link")->item(0)->nodeValue;  
			$title = $item->getElementsByTagName("title")->item(0)->nodeValue;

			$author = $item->getElementsByTagName("author")->item(0);
			if(isset($author))
				$author = $author->nodeValue;
			else
				$author = "";
			$date = $item->getElementsByTagName("pubDate")->item(0)->nodeValue;
			$body = $item->getElementsByTagName("description")->item(0)->nodeValue;
			$image_url = "";
			preg_match_all('/<img(.*)src=\"([^"]+)\"[^>]+>/isU',$body,$matches); 
			if(!empty($matches))
			{
				for($i=0;$i<count($matches[2]);$i++)
				{
				  	if($this->pic_exists($matches[2][$i]))
						$image_url = $image_url.$matches[2][$i].',';
				}

			}

			$data = array(
				'title' => $title, 
				'author' => $author,
				'date' => $date,
				'body' => $body,
				'image_url' => $image_url,
				'origin_url' => $link,
				);

			$Exist = $this->news_isExist($tag,$title);
			if(!isset($Exist))
				$this->db->insert($tag,$data);

		}
	}

	private function get_utf8_string($content) {    //  将一些字符转化成utf8格式
		$encoding = mb_detect_encoding($content, array('ASCII','UTF-8','GB2312','GBK','BIG5'));
		return  mb_convert_encoding($content, 'utf-8', $encoding);
	}

	private function pic_exists($url) {
		$curl = curl_init($url);
		// 不取回数据
		curl_setopt($curl, CURLOPT_NOBODY, true);
		// 发送请求
		$result = curl_exec($curl);
		$found = false;
		// 如果请求没有发送失败
		if ($result !== false) {
		// 再检查http响应码是否为200
			$found = true;
		}
		return $found;

	}
}