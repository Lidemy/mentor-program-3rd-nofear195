function add(a, b) {
  let arr1 = [];
  let arr2 = [];
  let i;
  const diff = Math.abs(a.length - b.length);
  if ((a - b) > 0) {
    arr1 = a.split('');
    arr2 = b.split('');
  } else {
    arr1 = b.split('');
    arr2 = a.split('');
  }
  for (i = 1; i <= diff; i += 1) {
    arr2.splice(0, 0, '0');
  }
  for (i = arr1.length - 1; i >= 0; i -= 1) {
    arr1[i] = Number.parseInt(arr1[i], 10) + Number.parseInt(arr2[i], 10);
    if (arr1[i] >= 10) {
      arr1[i] -= 10;
      arr2[i - 1] = Number.parseInt(arr2[i - 1], 10) + 1;
    }
  }
  return arr1.join('');
}

module.exports = add;
