const request = require('request');

request.get(
  'https://api.twitch.tv/kraken/games/top',
  (error, response, body) => {
    const obj = JSON.parse(body);
    obj.forEach((value) => { console.log(`${value.id} ${value.name}`); });
  },
);
