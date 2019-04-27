function isPrime(n) {
  let i;
  if (n === 1) return false;
  for (i = 2; i < n; i += 1) {
    if (n % i === 0) return false;
  }
  return true;
}

module.exports = isPrime;
