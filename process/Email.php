<?php

class Email {

    private $strEmail;
    private $strBody;
    private $strSubject;
    private $strUserID;
    private $strPass;

    public function __construct($strEmail, $strBody, $strSubject, $strUserID, $strPass) {
        $this->strEmail = $strEmail;
        $this->strBody = $strBody;
        $this->strSubject = $strSubject;
        $this->strUserID = $strUserID;
        $this->strPass = $strPass;
    }

    public static function mailsend($email, $sub, $body, $cc) {
        $count = 0;
        try {
            $transport = (new Swift_SmtpTransport('mail.numberwale.com', 587, 'tls'))
                ->setUsername('noreply@numberwale.com')
                ->setPassword('Mumbai@567');
            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message($sub))
                ->setFrom(['noreply@numberwale.com' => 'Numberwale.com'])
                ->setTo($email)
                ->setBody($body, 'text/html');

            if ($cc !== null && strlen($cc) > 5) {
                $ccEmails = explode(',', $cc);
                foreach ($ccEmails as $ccEmail) {
                    $message->addCc($ccEmail);
                }
            }

            $message->setReplyTo('support@numberwale.com');

            $result = $mailer->send($message);
            $count++;

        } catch (Exception $e) {
            echo 'Exception: ' . $e->getMessage();
        }

        return $count;
    }

    public static function mailsendAttach($sub, $body, $email, $filepath, $pdfFilename) {
        $count = 0;
        try {
            $transport = (new Swift_SmtpTransport('mail.numberwale.com', 587, 'tls'))
                ->setUsername('noreply@numberwale.com')
                ->setPassword('Mumbai@567');
            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message($sub))
                ->setFrom(['noreply@numberwale.com' => 'Numberwale.com'])
                ->setTo($email)
                ->setReplyTo($email)
                ->setBody($body, 'text/html');

            // Create a mime multipart message
            $attachment = new Swift_Attachment(file_get_contents($filepath), $pdfFilename);
            $message->attach($attachment);

            $result = $mailer->send($message);
            $count++;

        } catch (Exception $e) {
            echo 'Exception: ' . $e->getMessage();
        }

        return $count;
    }

    public static function main() {
        $bankDetails = "Bank Name :- IDBI BANK <br/>" .
            "Account Name : Numberwale <br/>" .
            "Account Number : 0536102000015242 <br/>" .
            "Branch Location : Bhayander(W) <br/>" .
            "IFSC CODE : IBKL0000536 <br/>" .
            "Type :- Current Account <br/>";

        $sub = "Estimate - EST-000464 is awaiting your approval";
        $body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                <title>Number Wale</title>
            </head>
            <body style='margin: 0px;'>
                <table align='center' style='width: 650px; font-size: 10.5pt; color: #000000; border-width: 1px; border-style: solid; border-color: #e5e5e5; font-family: arial' cellpadding='10' cellspacing='0'>
                    <tr>
                        <td style='background-color:#ff8400;'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                                <tr>
                                    <td><img src='https://www.numberwale.com/emailImgs/logo.png' width='200' height='72' alt=''/></td>
                                    <td align='right' style='color: #ffffff; font-size: 13pt;'><b>Numberwale.com</b></td>
                                </tr>
                            </tbody>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td style='border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #e5e5e5;'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                                <tr>
                                    <td colspan='3'><p style='font-size: 13pt;'><b>Dear Pranay Poojary,</b></p>
                                    <p>Greetings from Numberwale.com.</p>
                                    <p>We are delighted to have you as our valued customer and wish you good health and prosperity.</p>
                                    <p>Your estimate EST-000464 can be viewed, printed or downloaded as PDF from the link below.</p>
                                    <p>Please click the link below to view Estimate</p>
                                    <p>The Payment/Bank details for this Estimate are mentioned below: </p>
                                    <p>'$bankDetails' </p>
                                    <a href='https://numberwale.com/myInvoice?orderId=464&custId=538' target='_blank'>View Estimate</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='3'>
                                        <p>Now you can also reach us or can send us any Vanity Number related Document to the following address:<br/>
                                        <br/><b>Numberwale.com,
                                        Office No.6, Building No.1,
                                        Sagar Complex, Jesal Park,
                                        Bhayander (East),
                                        Mumbai - 401105.</b></p>
                                        <p>You may also visit our website <a href='https://www.numberwale.com' target='_blank' style='color: #c5342a;'>https://www.numberwale.com</a> to view your order history.</p>
                                        <p>Thank you for choosing us  We value your association and look forward to serving you with our products and services for many more years to come.</p>
                                        <br>
                                        <p>
                                        Warm regards,<br>
                                        <b>Numberwale.com</b><br/></p></td>
                                </tr>
                            </tbody>
                        </table></td>
                    </tr>
                    <tr>
                        <td style='background-color: #4a4a4a;'><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background-color: #4a4a4a; '>
                            <tbody>
                                <tr>
                                    <td width='67%' style='font-size: 9pt; color: #ffffff;'>In case you need any clarification, kindly get in touch with us at<br/> 9222222007 or email us at <a href='mailto:support@numberwale.com' style='color: #f38226;'>support@numberwale.com</a> and we'd be happy to assist you with your queries</td>
                                    <td width='33%'><table width='100%' border='0' align='right' cellpadding='1' cellspacing='0'>
                                        <tbody>
                                            <tr>
                                                <td width='20%'><a href='https://www.facebook.com/NumberWale/' target='_blank'><img src='https://www.numberwale.com/emailImgs/fb.jpg' width='39' height='38' alt=''/></a></td>
                                                <td width='20%'><a href='https://twitter.com/Numberwale' target='_blank'><img src='https://www.numberwale.com/emailImgs/twitter.jpg' width='39' height='38' alt=''/></a></td>
                                                <td width='20%'><a href='https://www.youtube.com/channel/UCYYOGkiZ14I6yGr2NjhGYzg/featured' target='_blank'><img src='https://www.numberwale.com/emailImgs/Youtube.jpg' width='39' height='38' alt=''/></a></td>
                                                <td width='20%'><a href='https://www.instagram.com/numberwale/' target='_blank'><img src='https://www.numberwale.com/emailImgs/instagram.jpg' width='39' height='38' alt=''/></a></td>
                                                <td width='20%'><a href='https://www.linkedin.com/company/numberwale/' target='_blank'><img src='https://www.numberwale.com/emailImgs/linkedin.jpg' width='39' height='38' alt=''/></a></td>
                                            </tr>
                                        </tbody>
                                    </table></td>
                                </tr>
                            </tbody>
                        </table></td>
                    </tr>
                </table>
            </body>
            </html>";

        self::mailsend("pranay@seniority.in", $sub, $body, "palakgupta@numberwale.com");
        // self::mailsendAttach("ghg", "gjhghg", "mukesh1216@gmail.com", "info@karmaalbums.com", "Krishna_2015", "", "");
    }

    public function run() {
        self::mailsend("mukesh1216@gmail.com", "Test", "Test", "");
    }
}

// Usage example:
Email::main();

?>
