
//alert("sientro");

var AWS = require('aws-sdk');

const s3 = new AWS.S3({
    region: 'us-east-1',
    apiVersion: '2006-03-01',
    credentials: {
      accessKeyId: 'AKIAQAVQA6VN6HK3Q6GL',
      secretAccessKey: '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'
}});

//AWS.config.update({accessKeyId: 'AKIAQAVQA6VN6HK3Q6GL', secretAccessKey: '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'})

//AWS.config.update({
//    region: 'us-east-1',
//    apiVersion: '2006-03-01',
//    credentials: {
//      accessKeyId: 'AKIAQAVQA6VN6HK3Q6GL',
//      secretAccessKey: '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'
//    }
//  })


// Tried with and without this. Since s3 is not region-specific, I don't
// think it should be necessary.
// AWS.config.update({region: 'us-west-2'})

const myBucket = 'admos3'
const myKey = 'phaxe.jpg'
const laruta = 'c:\img\gil\gil.jpeg'
const signedUrlExpireSeconds = 60 * 5


const url = s3.getSignedUrl('getObject', {
    Bucket: myBucket,
    Key: myKey,
    Expires: signedUrlExpireSeconds
})

console.log(url)

//alert(url);

//const getSingedUrl = async () => {    
//    const params = {
//      Bucket: 'admos3',
//      Key: 'search.jpg',
//      Expires: 60 * 5
//    };
  
//    try {
//      const url = await new Promise((resolve, reject) => {
//        s3.getSignedUrl('getObject', params, (err, url) => {
//          err ? reject(err) : resolve(url);
//        });
//      });
//      console.log(url)
     
//    } catch (err) {
//      if (err) {
//        console.log(err)
//      }
//    }
//  }
  
  
 // getSingedUrl()