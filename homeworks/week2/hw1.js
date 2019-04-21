function printStars(n) {
  let star = ' ';
  let i;
  for (i = 1; i <= n; i += 1) {
    star += '*';
    console.log(star);
  }
}

printStars(5);
