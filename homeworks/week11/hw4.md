## 請說明雜湊跟加密的差別在哪裡，為什麼密碼要雜湊過後才存入資料庫
* 雜湊跟加密的差別
  1. 雜湊函數：一種單向的函數，其共同特性為：若兩者 output 不同，則可以確定兩者的 input 必不相同
  2. 加密：藉由特定方法將資料轉換成另一種形式，達到保護資料的目的
  3. 差異：使用雜湊函數只是加密資料的方法之一
* 為什麼密碼要雜湊過後才存入資料庫
  * 防止資料庫被入侵後連同密碼也一並被取得
## 請舉出三種不同的雜湊函數
MD5、SHA-256、Streebog

## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別
* Session：存放使用者的訊息，當使用者完成身分驗證後，儲存使用者資料、產生一組對應的 id並確保 id 的唯一性、最後將 id 透過 Cookie 傳回 client 端，待下次相同 client 端攜帶同一組 id，透過比對其攜帶的 id 與資料庫儲存之對應 id 的一致性後，即可驗證為相同使用者所發出的請求，達成防止 client 被竄改的目的
* Session 跟 Cookie 的差別
  * Session 將資料保存在 Server 端
  * Cookie  將資料保存在 Client 端
  * Session 可藉由 Cookie 驗證來自 Client 端使用者資訊的一致性
* 參考資料
  * https://progressbar.tw/posts/92
  * http://bbbb7787.blogspot.com/2010/10/session-cookie.html
  * https://kknews.cc/zh-tw/other/gglegle.html
  * https://blog.hellojcc.tw/2016/01/12/introduce-session-and-cookie/
##  `include`、`require`、`include_once`、`require_once` 的差別
* `include`、`include_once`：
  * 相同：匯入指定檔案，並執行指定檔案內的程式
  * 相異：`include_once` 避免重複匯入，只允許檔案匯入一次，若匯入第二次則回傳錯誤訊息
* `require`、`require_once`：
  * 相同：匯入指定檔案，並將自身指令代換成指定的檔案
  * 相異：`require_once` 避免重複匯入，只允許檔案匯入一次，若匯入第二次則回傳錯誤訊息
* `include`、`require`：
  * 相同：匯入指定檔案
  * 相異：
    1. `require` ：因為已將自身指令代換成指定的檔案，所以當匯入的程式發生錯誤，整個程式會停止執行，較適合匯入靜態檔案
    2. `include`：因為是執行指定檔案內的程式，所以當匯入的程式發生錯誤，整個程式會繼續執行，較適合匯入動態檔案
* 參考資料：https://codertw.com/%E7%A8%8B%E5%BC%8F%E8%AA%9E%E8%A8%80/239900/
