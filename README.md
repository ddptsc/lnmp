使用说明：
一、安装最新Docker CE
1.卸载旧版
yum remove docker docker-common docker-selinux docker-engine
2.安装依赖的软件包
yum install -y yum-utils device-mapper-persistent-data lvm2
3.设置使用 stable 软件源
#yum-config-manager -add-repo https://download.docker.com/linux/centos/docker-ce.repo
4.创建软件源缓存
#yum makecache fast
5安装最新版本 Docker CE
#yum install docker-ce
6启动docker
#systemctl start docker
7.查看docker版本
#docker --version
Docker version 18.03.1-ce, build 9ee9f40

**************************************************************************

二、安装Docker-Compose
1.# 首先检查linux有没有安装python-pip包
# pip -V
-bash: pip: command not found
2.如上显示就表示没有安装python-pip，安装pip
#yum -y install epel-release 
#yum -y install python-pip
3.升级pip
#pip install --upgrade pip
4.安装pip install docker-compose
#pip install docker-compose
5.查看docker版本
#docker-compose version
docker-compose version 1.22.0-rc1, build e7de1bc3

**************************************************************************

三、下载lnmp.yml并创建镜像容器
#cd ~
#git clone https://github.com/ddptsc/lnmp.git;
#cd lnmp
执行docker-compose创建镜像容器
#docker-compose -f lnmp.yml up
当出现下面语句表示成功
mysql    | Version: '5.7.22'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server (GPL)
Ctrl+c退出安装，这里也可以在docker-compose 加上-d后台运行创建
启动lnmp容器
#docker-compose -f lnmp.yml start

**************************************************************************

四、测试：
1.docker ps 查看mysql容器的id,IMAGE为lnmp_mysql就是mysql容器
1."docker inspect lnmp_mysql"容器ip
2.mysql -uroot -p123456 -h 172.19.0.2链接mysql

3.创建数据
CREATE DATABASE test;
use test;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `age` int(11) NOT NULL DEFAULT '0',
  `flag` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

 
insert  into `user`(`id`,`name`,`gender`,`age`,`flag`) values (1,'allen',1,20,1),(2,'alice',2,18,1),(3,'bob',1,21,1),(4,'dave',1,25,1),(5,'eve',2,20,1),(6,'joy',1,21,1),(7,'june',1,23,1),(8,'linda',2,22,1),(9,'lisa',2,22,1),(10,'liz',2,23,1);

4.浏览器打开 
http://192.168.1.142:8002/
5.出现
Array
(
    [0] => Array
        (
            [id] => 1
            [0] => 1
            [name] => allen
            [1] => allen
            [gender] => 1
            [2] => 1
            [age] => 20
            [3] => 20
            [flag] => 1
            [4] => 1
        )

    [1] => Array
        (
            [id] => 2
            [0] => 2
            [name] => alice
            [1] => alice
            [gender] => 2
            [2] => 2
            [age] => 18
            [3] => 18
            [flag] => 1
            [4] => 1
        )
lnmp环境搭建成功
