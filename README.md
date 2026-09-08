> ⚠️ **참고**: 이 저장소는 「웹해킹실습」 과목 프로젝트의 학습용 게시판 사이트(Unisite) 원본 소스입니다. 의도적으로 SQL Injection, XSS, 파일 업로드, Directory Listing 등의 취약점을 포함한 상태로 만들어졌으며(`DB_config.php`의 DB 계정도 로컬 개발용 기본값), 실서비스 배포 목적이 아닌 취약점 분석·패치 실습 목적의 코드입니다. 실습 및 대응 과정 상세 내용은 별도 보고서를 참고하세요.

# Create_WEB

HTML, PHP, MySQL, JS, Python 학습하여 웹사이트 구현<br/>
학습방법은 자율적으로 진행(오픈튜토리얼스. 점프투파이썬 추천)<br/>
※ 요구사항<br/>
  계정 : 회원가입 기능,   로그인 기능,  이메일 인증 <br/>
  게시판 : 글쓰기, 댓글, 추천, 파일 업로드<br/>
  검색 : 제목, 게시판 별, 전체, 내용 기준 검색<br/>
  조회수 : F5방지용 1시간 마다 갱신 가능하게<br/><br/>

※환경<br/>
Apache2.4<br/>
PHP7<br/>
MySQL 8.0.22<br/>
<br/>
문서<br/>
index.html -> 완(2023_02_05)<br/>
sing_in    -> 완(2023_02_04) -> 기능 완료(2023_02_09)<br/>
sign_up    -> 완(2023_02_04) -> 기능 완료(2023_02_09)<br/>
sign_out   -> 완(2023_02_10)<br/><br/>

/board<br/>
main_board    -> 완(2023_02_04)<br/>
secret_board  -> 완(2023_02_04)<br/>
test_board    -> 완(2023_02_04)<br/>
write         -> 완(2023_02_04)<br/>
modify        -> 완(2023_02_14)<br/>
delete        -> 완(2023_02_14)<br/>
search_result -> 완(2023_02_14)<br/><br/>
/user<br/>
profile       -> 완(2023_02_14)<br/>
settings      -> 완(2023_02_14)<br/>
<br/>
기타<br/>
session 완(2023_02_10)<br/>
session_check 완(2023_02_10)<br/>
이메일 인증 완(2023_02_11)<br/>
파일 업로드 완(2023_02_14)<br/>
댓글, 추천 완(2023_02_12)<br/>
조회수 완(2023_02_13)<br/>
게시글 리스트 조회 완(2023_02_12)<br/>
게시글 클릭 및 읽기 완(2023_02_12)<br/>
find_password -> 완료(2023_02_16)

DB<br/>
<img src=image/MYSQL_ERD.png>

<b>user table</b><br/>
email(PK) pw nick_name first_name last_name address confirm<br/>

<b>article table<br/>
idx(index - PK) board Title(str) Content File(varchaar) article_pw hit like date<br/><br/>

<b>comments</b><br/>
comment_idx(INT PK) comment post_id(FK - article) email(FK - user)

<b>recomment</b><br/>
idx(INT PK) post_id(FK - article) email(FK - user) like

<b>confirmation_code</b><br/>
idx(INT PK) code email(FK - user)

<b>views</b><br/>
idx ip wawtch_time post_id(FK - article)  

<!--대용량 데이터 업로드 https://anotherspringfield.tistory.com/100-->


