function capitalize(str) {
  const diff = 'a'.charCodeAt(0) - 'A'.charCodeAt(0);
  let newStr;
  if (str[0] >= 'a' && str[0] <= 'z') {
    newStr = str.replace(str[0], String.fromCharCode(str.charCodeAt(0) - diff));
    return newStr;
  }
  return str;
}

console.log(capitalize('hello'));
