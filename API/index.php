<!doctype HTML>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="theme-color" content="#1757bb">
        <link rel="stylesheet" type="text/css" href="./css/style.css?v=2020052505" />
        <script src="https://kit.fontawesome.com/24c1a5db21.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
        <script src="./js/script.js?v=2020052602"></script>
        <title>부산시 주변 대중교통 정보</title>
    </head>
    <body>
        <div id="header">
            <!-- 상단 로고 -->
            <h3 id="site_title">부산시 주변 대중교통 정보</h3>
            <h4 id="maker">박규효</h4>
            <div class="cb"></div>
        </div>
        <!-- 검색바 -->
        <div id="search_bar">
            <form id="search_form">
                <select name="sch_type">
                    <option value="0">건물명</option>
                    <option value="1">도로명</option>
                </select>
                <input type="text" name="sch_addr" id="pop_open" placeholder="주변 건물 이름">
                <button id="sch_btn"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div id="content">
            <!-- 버스 / 지하철 탭 -->
            <ul>
                <li class="off on">버스 도착 정보</li>
                <li class="off">지하철 도착 정보</li>
            </ul>
            <div class="cb"></div>
            <!-- 데이터 출력 부분 -->
            <div id="result_part">
                <div id="list_items">
                    <div class="item"></div>
                    <div class="item"></div>
                </div>
            </div>
        </div>
        <div id="footer">
            <!-- copyright -->
        </div>

        <div id="search_pop">
            <div id="search_bar">
                <form id="search_form">
                    <select name="sch_type">
                        <option value="0">건물명</option>
                        <option value="1">도로명</option>
                    </select>
                    <input type="text" name="sch_addr" placeholder="주변 건물 이름">
                    <button id="sch_btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div id="bottom_btn">
                <input type="button" value="취 소">
            </div>
        </div>
    </body>
</html>