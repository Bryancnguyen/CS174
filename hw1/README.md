# CS174 HW1
##BRYAN NGUYEN, RICHARD PAPALIA, JACK WANKE

* [x] In-Class Demo: Before or on the homework due date, each student needs to show me on their laptop that they have installed Apache, PHP, and Mysql or MariaDB. If you decide, as I suggest, to install XAMPP to get stuff running, then I will test that your installation is working by going to the phpMyAdmin page. This portion of the homework must be demo'd individually to receive points, not as a group. The remainder of the assignment can be done in a group.

* [x] Experiments:
Connect your phone and your laptop to the same LAN. View the default page of your Apache installation of your laptop in a browser on your phone. Take a screenshot and include it in the Hw1.zip as the file as either phone_screenshot.jpg or phone_screenshot.png.

* [x] Next on your laptop locate the Apache log folder and look at the access.log file. Find the entry corresponding to the access from your phone. Determine what User-Agent string was given by your phone. Put the relevant portion of the log file and at least one additional line for the User-Agent string answer in a file access_results.txt that you include in Hw1.zip.

* [x] In a shell, using curl, download the Facebook, Google, Wikipedia, Yahoo, Youtube pages with the -v flag (for verbose). Look at the request and response HTTP headers. What User agent does curl use by default? Which of these sites change if in addition you use the -A flag and set the user agent to be that of your phone? Put transcripts of your curl requests and your answers to these questions in a file curl_results.txt. that you include in your Hw1.zip file. Note curl is probably already installed on Mac and Linux, but you will probably need to download it on Windows.

* [x] Pick four response headers that were received while doing the experiment above, and which we have not discussed in class. For each of them, find out what they are for, write up these headers and what they are for in the file headers.txt which you include in your Hw1.zip file.

* [x] Web Pages: Make a HTML 5 validating, web page with title Computer Science Department, SJSU 2067 that represents how you think the CS Departments web page will look like in 2067. Here are some additional requirements of this page:
Your page should use a &lt;link&gt; tag to specify a favicon. You should include this icon in your Hw1.zip folder.

Your page should have at least two &lt;a&gt; tags to two other HTML 5 validating pages you create. The href attributes in these tags should use relative paths so it doesn't matter what folder your page is served from.

Your page should have at least one &lt;img&gt; tag that correctly loads a png image that you include in your Hw1.zip folder. The src attribute of this tag should use a relative path.

Your page should at least once constructively use the following tags: &lt;ul&gt;, &lt;table&gt;, &lt;span&gt;. You can use the span tag for example to give a tooltip for some item on the page.

