function printFactor(n) {
  let i;
  for (i = 1; i <= n; (i += 1)) {
    if (n % i === 0) {
      console.log(i);
    }
  }
}

printFactor(10);
