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
      secretAccessKey: 'C63ZsKEIt5KeIby0Xb2xgRD+Wsa6jo6MvHR95x83'
    }
  })


// Create unique bucket name
var bucketName = 'node-sdk-sample-' + uuid.v4();
// Create name for uploaded object key
var keyName = 'hello_world.txt';

// Create a promise on S3 service object
var bucketPromise = new AWS.S3({apiVersion: '2006-03-01'}).createBucket({Bucket: bucketName}).promise();

// Handle promise fulfilled/rejected states
bucketPromise.then(
  function(data) {
    // Create params for putObject call
    var objectParams = {Bucket: bucketName, Key: keyName, Body: 'Hello World!'};
    // Create object upload promise
    var uploadPromise = new AWS.S3({apiVersion: '2006-03-01'}).putObject(objectParams).promise();
    uploadPromise.then(
      function(data) {
        console.log("Successfully uploaded data to " + bucketName + "/" + keyName);
      });
}).catch(
  function(err) {
    console.error(err, err.stack);
});