function join(str, concatStr) {
  let i;
  let newStr = '';
  for (i = 1; i < str.length; i += 2) {
    str.splice(i, 0, concatStr);
  }
  for (i = 0; i < str.length; i += 1) {
    newStr += str[i];
  }
  return newStr;
}

function repeat(str, times) {
  let i;
  let newStr = '';
  for (i = 1; i <= times; (i += 1)) {
    newStr += str;
  }
  return newStr;
}

console.log(join('a', '!'));
console.log(repeat('a', 5));
