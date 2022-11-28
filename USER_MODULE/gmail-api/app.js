const nodemailer = require('nodemailer');
const { google } = require('googleapis');

// These id's and secrets should come from .env file.
const CLIENT_ID = '271715899431-0vusrkdefupqvgssnfg7e8p3387cintv.apps.googleusercontent.com';
const CLEINT_SECRET = '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';
const REDIRECT_URI = 'https://developers.google.com/oauthplayground';
const REFRESH_TOKEN = '1//04xXff7hADT8DCgYIARAAGAQSNwF-L9IrffGtSXbm6RoqwDbEifQKD7P_Uxdn4xJ3DlJDna22Vuv1ya6CwsFTNB8xaTvt13Eb7jY';

const oAuth2Client = new google.auth.OAuth2(
  CLIENT_ID,
  CLEINT_SECRET,
  REDIRECT_URI
);
oAuth2Client.setCredentials({ refresh_token: REFRESH_TOKEN });

async function sendMail(recepient,recepient_email) {
  try {
    const accessToken = await oAuth2Client.getAccessToken();

    const transport = nodemailer.createTransport({
      service: 'gmail',
      auth: {
        type: 'OAuth2',
        user: 'calvin.sendawula@strathmore.edu',
        clientId: CLIENT_ID,
        clientSecret: CLEINT_SECRET,
        refreshToken: REFRESH_TOKEN,
        accessToken: accessToken,
      },
    });

    const mailOptions = {
      from: 'Calvin at GreenSoko <calvin.sendawula@strathmore.edu>',
      to: recepient_email,
      subject: '2nd Green Soko Gmail API test',
      text: 'Greetings from Green Soko. This is the second API test.',
      html: '<h3>Hey '+ recepient +'</h3><p>Greetings from Green Soko. This is an API test for ...</p><h4>email automation</h4>',
    };

    const result = await transport.sendMail(mailOptions);
    return result;
  } catch (error) {
    return error;
  }
}

/*const recepients = ["Calvin","Jean","Danroy","Cynthia","Nelson","Cindy","Assumpta","Michael"];
const recepients_emails = ["calvin.sendawula@strathmore.edu","jean.wasike@strathmore.edu","danroy.mwangi@strathmore.edu","rebecca.muiruri@strathmore.edu","nelson.mwangi@strathmore.edu","cindy.bosibori@strathmore.edu","mwikali.assumpta@strathmore.edu","michael.kimuri@strathmore.edu"];

for (var i = 0; i < recepients.length; i++) {
    sendMail(recepients[i],recepients_emails[i])
        .then((result) => console.log('Email sent to ' + recepients[i] + "\n", result))
        .catch((error) => console.log("\n" + error.message));
}*/

const recepient = "Maria";
const recepient_email = "calvinsendawula188@gmail.com";

sendMail(recepient,recepient_email)
    .then((result) => console.log('Email sent to ' + recepient + "\n", result))
    .catch((error) => console.log("\n" + error.message));
