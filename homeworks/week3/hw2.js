function alphaSwap(str) {
  return str.split('').map((value) => {
    if (value >= 'A' && value <= 'Z') {
      return value.toLowerCase();
    }
    return value.toUpperCase();
  }).join('');
}

module.exports = alphaSwap;
