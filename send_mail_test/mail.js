const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));

// Endpoint for sending emails
app.post('/send-email', (req, res) => {
  const { from, subject, text } = req.body;

  // Credentials for the mailing server using google smtp, make a dummy email to act as the server
  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'wasdeq68@gmail.com', //i will leave this here so you can test
      pass: 'qnan mhsp rnrz xpms',// dont change anything
    },
  });

  // Define the email options
  const mailOptions = {
    from,
    to: 'example@gmail.com', //This is the email all the emails will be sent by the form
    subject,
    text,
  };

  // Send the email
  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      return res.status(500).send(`Error: ${error.message}`);
    }
    res.status(200).send('Email sent: ' + info.response);
  });
});

app.listen(port, () => {
  console.log(`Mail server listening at http://localhost:${port}`);
});


//emails sent will be from my email until you setup the dummy email to act as the mailing server