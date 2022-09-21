
// Load the SDK and UUID


var AWS = require('aws-sdk');
var uuid = require('uuid');

//aws_access_key_id = 'AKIAQAVQA6VN6HK3Q6GL'
//aws_secret_access_key = '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'

AWS.config.update({
    region: 'us-east-1',
    apiVersion: '2006-03-01',
    credentials: {
      accessKeyId: 'AKIAQAVQA6VN6HK3Q6GL',
      secretAccessKey: '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'
    }
  })

  const url = AWS.S3.getSignedUrl('getObject', {
    Bucket: 'admos3',
    Key: 'logo.png',
    Expires: signedUrlExpireSeconds
})

console.log("URL " + url);