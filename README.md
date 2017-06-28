## 文件说明(非框架提供部分)

/application

​	/controllers

​		getNews.php	负责获取新闻正文处理

​		Login.php		负责登录处理

​		register.php		负责注册处理

​		Update.php		负责页面刷新和新闻更新处理

​		UserManage.php负责用户账号管理和感兴趣栏目设置处理

​	/models

​		news_model.php	新闻模型

​		rss_model.php	RSS模型

​		users_model.php	用户模型

​		users_tag.php	用户感兴趣栏目模型

​	/views

​		/templates/header.php	界面模版

​		login.php				登录界面

​		news.php				新闻正文界面

​		news_list.php			新闻列表界面

​		register.php				注册界面

​		userManage.php			用户管理界面

/css		定制的css文件

/js		定制的js文件

/image	图片

## 本地部署配置

1. 把News整个文件夹放到web root 根目录下

2. 把News下的News.sql导入数据库

3. 设置application/config/database.php, 修改hostname、username和password为本地版本

4. 启动定时任务(其他系统请自行搜索可使用的工具)

   在linux/mac下，使用控制台输入命令：crontab -e进入编辑

   ```
   */10 * * * * php /User/cai/Sites/News Update updatee
   ```

   启动crontab后，该任务会每隔10分钟执行News文件下的Update控制器中的updatee函数，以此来达到更新新闻的目的

5. 通过localhost/News访问