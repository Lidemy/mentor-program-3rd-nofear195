## 交作業流程
1. 開一個新的 branch: `git branch week1`
2. 切換到 branch: `git checkout week1`
3. 更改檔案（寫作業、修改作業）
4. commit 檔案: `git commit -am "hw1"`
5. 等 eslint 測試，若通過則跳至 6.，否則跳回 3.
6. push branch to GitHub: `git push origin week1`
7. 在 GitHub 頁面上找到 " Your rencetly pushed branches:" 並點擊右方 "Compare & pull request"
8. 在 "Open a pull request" 中
   1. 檢查 merge 的方向 (base:master <<-- compare:week1)
   2. 新增標題及內容（任意）
   3. 查看檔案中更改的地方
   4. press "Create pull request"
   5. copy URL
9. 到 [交作業專用repo](https://github.com/Lidemy/homeworks-3rd)
   1. 新增 new Issue，標題格式為： > [WeekX]，X=週數
   2. 內容第一行貼上 URL，其他行寫心得
   3. press "Submit new issue"
   4. 等待 branch be merged 及 issue be closed
10. 切換到 master: `git checkout master`
11. pull mege 完的master: `git pull origin master`
12. 刪除 branch(week1): `git branch -D week1`
13. 完成交作業程
