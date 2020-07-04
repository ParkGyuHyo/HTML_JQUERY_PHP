<!doctype html>
<html>
<head>
 <title>201987062 박규효 HTML5</title>
 <link rel="stylesheet" type="text/css" href="../css/html5.css?v=4">
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script type="text/javascript">
  $(function(){

   var target_nav = document.querySelector("nav ul");

   var menulst = [
    {'url': '02-intro.html', 'subject': '주인장'},
    {'url': '01-02.php', 'subject': '구구단'},
    {'url': '02-03.php', 'subject': '1~10 정수출력'},
    {'url': '02-04.php', 'subject': '1~10 홀짝출력'},
    {'url': 'Report3-1.htm', 'subject': '나이 구하기'},
    {'url': 'Report4-1.htm', 'subject': '성적 구하기'},
    {'url': 'Report5-1.htm', 'subject': '구구단2'},
    {'url': 'Report05_21_1.php', 'subject': '5월 21일 과제'},
    {'url': 'Report7-1.html', 'subject': '게시판'},
    {'url': 'Report_0611.php', 'subject': 'Query 테스트'},
    {'url': 'Report_0611_2_1.php', 'subject': 'PHP 방명록'},
    {'url': 'count2.php', 'subject': '방문자 통계'},
    {'url': './member/login.php', 'subject': '멤버 관리'}
   ];

   var create_li, create_atag, create_subject;

   menulst.forEach(function(data){
    create_li = document.createElement("li");
    create_atag = document.createElement("a");
    create_atag.setAttribute("href", data['url']);
    create_atag.setAttribute("target", "sriframe");
    create_subject = document.createTextNode(data['subject']);
    create_atag.appendChild(create_subject);
    create_li.appendChild(create_atag);
    target_nav.appendChild(create_li);
   });
  });
 </script>
</head>
<body>
<div class="allcontents">
 <header>
  <h3>
   PHP 실습 사이트
   <? include "./count.php"; ?>
  </h3>

  <h4>201987062 박규효</h4>
  <div class="cb"></div>
 </header>
 <nav>
  <ul>
  </ul>
 </nav>
 <section>
  <iframe name="sriframe" src=""></iframe>
 </section>
</div>
</body>
</html>