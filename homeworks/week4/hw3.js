const request = require('request');
const process = require('process');

switch (process.argv[2]) {
  case 'list': {
    request(
      'https://lidemy-book-store.herokuapp.com/books?_limit=20',
      (error, response, body) => {
        const obj = JSON.parse(body);
        obj.forEach((value) => { console.log(`${value.id} ${value.name}`); });
      },
    );
    break;
  }
  case 'read': {
    request(
      'https://lidemy-book-store.herokuapp.com/books/ + process.argv[3]',
      (error, response, body) => {
        const obj = JSON.parse(body);
        console.log(obj.name);
      },
    );
    break;
  }
  case 'delete': {
    request.delete(
      'https://lidemy-book-store.herokuapp.com/books/ + process.argv[3]',
    );
    break;
  }
  case 'create': {
    request.post(
      'https://lidemy-book-store.herokuapp.com/books', {
        form: { name: process.argv[3] },
      },
    );
    break;
  }
  case 'update': {
    request.patch(
      'https://lidemy-book-store.herokuapp.com/books/ + process.argv[3]', {
        form: { name: process.argv[4] },
      },
    );
    break;
  }
  default:
    console.log('wrong input');
}
