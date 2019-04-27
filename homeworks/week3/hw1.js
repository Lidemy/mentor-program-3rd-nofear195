function starNum(n) {
  let num = '';
  let i;
  for (i = 1; i <= n; i += 1) {
    num += '*';
  }
  return num;
}

function stars(n) {
  const arr = [];
  let i;
  for (i = 1; i <= n; i += 1) {
    arr.push(starNum(i));
  }
  return arr;
}

module.exports = stars;
