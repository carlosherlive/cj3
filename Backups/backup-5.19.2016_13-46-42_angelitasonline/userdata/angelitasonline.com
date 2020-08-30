--- 
customlog: 
  - 
    format: combined
    target: /usr/local/apache/domlogs/angelitasonline.com
  - 
    format: "\"%{%s}t %I .\\n%{%s}t %O .\""
    target: /usr/local/apache/domlogs/angelitasonline.com-bytes_log
documentroot: /home/angelitasonline/public_html
group: angelitasonline
hascgi: 1
homedir: /home/angelitasonline
ip: 192.185.155.237
owner: ab7669
phpopenbasedirprotect: 1
port: 80
scriptalias: 
  - 
    path: /home/angelitasonline/public_html/cgi-bin
    url: /cgi-bin/
  - 
    path: /home/angelitasonline/public_html/cgi-bin/
    url: /cgi-bin/
serveradmin: webmaster@angelitasonline.com
serveralias: www.angelitasonline.com
servername: angelitasonline.com
usecanonicalname: 'Off'
user: angelitasonline
userdirprotect: -1
