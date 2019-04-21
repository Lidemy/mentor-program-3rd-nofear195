function reverse(str) {
  let newStr = ' ';
  let i;
  for (i = (str.length - 1); i >= 0; i -= 1) {
    newStr += str[i];
  }
  return newStr;
}

reverse('hello');
