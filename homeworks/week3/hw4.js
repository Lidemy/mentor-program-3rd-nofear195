function isPalindromes(str) {
  let i;
  const strHalf = Math.floor(str.length / 2);
  for (i = 0; i < strHalf; i += 1) {
    if (str[i] !== str[(str.length - 1 - i)]) return false;
  }
  return true;
}

module.exports = isPalindromes;
