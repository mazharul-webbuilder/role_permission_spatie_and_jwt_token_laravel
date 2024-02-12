<h1>Redis Installation and Working Process</h1>
<hr>
<ul>
<li>Download Redis fist to your system, if you are in linux OS you just in heaven, if your 
os is Windows if have to follow few extra steps
<ol>
<li>Install WSL2 on your system.</li>
<li>from php.ini enable <span style="color: yellowgreen">sodium</span> package, you may have to do is on you linux system too</li>

</ol></li>
<li>
Install On linux
</li>
sudo apt update <br>
sudo apt install redis-server <br>
<li>On you laravel application, change you env file with CACHE_DRIVER = redis</li>
<li>Install predis package, just search on google you will find it</li>
<li>On windows before implement redis to get accurate response, search Ubuntu on your system and just make to terminal open</li>
<li>Add those line on env,</li>
REDIS_HOST=127.0.0.1 <br>
REDIS_PORT=6379 <br>
REDIS_PASSWORD=NULL <br>
<li>From config/database.php change redis_client=predis</li>
</ul>
<hr>
<p>All set, you are ready to implement redis cache on you local environment. check RedisCacheCrudController file to check how to implement redis</p>
<hr>
<a href="https://youtu.be/3mAX8pjAtyU">Youtube Tutorial Link 1</a>
