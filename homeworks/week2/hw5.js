function join(str, concatStr) {
  let i;
  let newStr = '';
  let newStr2 = '';
  for (i = 0; i < str.length; (i += 1)) {
    newStr += str[i] + concatStr;
  }
  if (newStr.length > str.length) {
    for (i = 0; i < (newStr.length - 1); (i += 1)) {
      newStr2 += newStr[i];
    }
    return newStr2;
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
