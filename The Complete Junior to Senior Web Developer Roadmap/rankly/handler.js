'use strict';

module.exports.rank = async (event, context) => {
  const emojis = [
    '😀', '😁', '😂', '🤣', '😃', '😄', '😅'
  ];

  const rank = event.queryStringParameters.rank || 0;
  const rankEmoji = emojis[rank >= emojis.length ? emojis.length - 1 : rank]; 

  return {
    statusCode: 200,
    body: JSON.stringify({
      message: 'Go Serverless v1.0! Your function executed successfully!',
      input: rankEmoji,
    }),
  };

  // Use this code if you don't use the http event with the LAMBDA-PROXY integration
  // return { message: 'Go Serverless v1.0! Your function executed successfully!', event };
};
