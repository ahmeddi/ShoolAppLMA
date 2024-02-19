<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Profil;

class WhatsappApiService
{

    public $ecoleNom;
    public $ecoleNomfr;
    public $site;


    public function __construct() {

        $profil = Profil::find(1);

        $this->ecoleNom = $profil->nom;
        $this->ecoleNomfr = $profil->nomfr;
        $this->site = $profil->site;

    }


    function sendCurlRequest($phone, $message)
    {
        $profil = Profil::find(1);
        $url = $profil->url;
        $token = $profil->token;

        $curl = curl_init();
    
        $data = [
            'typing_time' => 0,
            'to' => $phone,
            'body' => $message,
        ];
    
        $headers = [
            'accept: application/json',
            "authorization: Bearer $token",
            'content-type: application/json',
        ];
    
        curl_setopt($curl, CURLOPT_URL, "$url");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
        $response = curl_exec($curl);
    
        $success = false;
    
        if ($response !== false) {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
                $success = true;
            }
        }


    
        curl_close($curl);
    
        return $success;
    }
    
    function test($recipientPhone, $messageBody)
    {
        $phone = '222' . $recipientPhone;
        return $this->sendCurlRequest($phone, $messageBody);
    }

    function sentPass($tel,$code,$wh,$pass)  
    {
       // dd($this->site);
        $web = $this->site; 

        $phone = $code . $wh;


        $arr = [];

        $arr[] = $this->sendCurlRequest($phone, $web);
        $arr[] = $this->sendCurlRequest($phone, $tel);
        $arr[] = $this->sendCurlRequest($phone, $pass);



        if (in_array(true, $arr)) {
           return 1;
        } else {
            return 0;
        }
        
    }
    
    function recets($id,$recipientPhone,$code,$nom,$nomfr,$sex, $date,$montant)
    {
        $ecoleNom = $this->ecoleNom;
        $ecoleNomfr = $this->ecoleNomfr;

        $mar = 'السيد';
        $mallar = 'السيدة';

        $mrpr = ($sex == 1) ? $mar : $mallar;
        $mrprfr = ($sex == 1) ? 'M.' : 'Mme';

        $phone = $code . $recipientPhone;

        $dates = Carbon::parse($date);


        $recu = $dates->format('dmy').$id;


        $messageFr = " $mrprfr $nomfr  Vous avez payé le montant $montant le $date avec succès";
        $messageAr = "*وصل رقم:  $recu*  

$mrpr $nom  لقد دفعتم المبلغ $montant بنجاح في $date

وتعتبر هذه الرسالة بمثابة وصل رقمي للدفع        

*$ecoleNom*";

        $messageFr = "*Reçu N°: $recu* 

$mrprfr $nomfr  Vous avez payé le montant $montant le $date avec succès

Ce message est considéré comme un reçu numérique de paiement

*$ecoleNomfr*";


        
        $ar = $this->sendCurlRequest($phone, $messageAr);
        $fr = $this->sendCurlRequest($phone, $messageFr);

        if ($ar or $fr) {
           return 1;
        }
        else return 0;



    }
    
    function notes($phoneId, $etud_nom, $etud_nomfr, $etud_nompr, $etud_nomprfr, $note,$code, $lang)
    {
        $ecoleNom = $this->ecoleNom;
        $ecoleNomfr = $this->ecoleNomfr;

        $phone = $code . $phoneId;

        /*
        Votre enfant a reçu une nouvelle observation, merci de bien vouloir signer son carnet
         */
    
        $messageFr = "Bonjour,
    
        Votre enfant $etud_nomfr a reçu une nouvelle observation $note, merci de bien vouloir signer son carnet. 

*$ecoleNomfr*";
    
        $messageAr = "مرحبًا
                
        لقد تلقى ابنكم $etud_nomfr ملاحظة جديدة $note, يرجى مراجعة دفتره.            


*$ecoleNom*";
    
        $message = $lang == 1 ? $messageAr : $messageFr;
    
        return $this->sendCurlRequest($phone, $message);
    }

    public function creates($nom,$nomfr,$nompr,$nomprfr,$sex,$sexpr,$recipientPhone,$code,$pass) 
    {

        $ecoleNom = $this->ecoleNom;
        $ecoleNomfr = $this->ecoleNomfr;

        $phone = $code . $recipientPhone;

 
         $mrpr = ($sex == 1) ? 'السيد' : 'السيدة';
         $mr = ($sexpr == 1) ? 'تلميذكم' : 'تلميذتكم';
         $mrfr = ($sex == 1) ? 'il' : 'elle';
         $mrprfr = ($sexpr == 1) ? 'M.' : 'Mme';
 
         $messageBodyAr = "$mrpr $nompr.

أتمنى أن تكونوا بأتم الصحة والعافية. نحن نود أن نعبر لكم عن تقديرنا وامتناننا العميق لاختياركم لإشراك $mr $nom في مدرستنا.
         
نحن متحمسون للتعاون معكم . إذا كان لديكم أي استفسارات أ خلال هذا العام الدراسي، فلا تترددوا في الاتصال بنا في أي وقت.
         
 
 
 
مع أطيب التحيات،

*$ecoleNom*";
 
         $messageBodyFr = "$mrprfr $nomprfr.

Nous espérons que vous vous portez bien. Nous tenons à vous exprimer notre profonde appréciation et gratitude pour avoir choisi d'inscrire $mrfr $nomfr à notre école.
 
Nous sommes impatients de collaborer avec vous. Si vous avez des questions tout au long de cette année scolaire, n'hésitez pas à nous contacter à tout moment.
 
 
 Cordialement,
 
 *$ecoleNomfr*";
 
 $web = $this->site; 

         $arr = [];
 
         $arr[] = $this->sendCurlRequest($phone, $messageBodyAr);

         $arr[] = $this->sendCurlRequest($phone, $messageBodyFr);
         $arr[] = $this->sendCurlRequest($phone, $web);
         $arr[] = $this->sendCurlRequest($phone, $recipientPhone);
         $arr[] = $this->sendCurlRequest($phone, $pass);
 
         if (in_array(true, $arr)) {
            return 1;
         } else {
             return 0;
         }
 
 
 
 
     }

     public function attd($studentName, $studentNamefr, $recipientPhone ,$code,$studentGender, $time, $date) : int
     {

        $ecoleNom = $this->ecoleNom;
        $ecoleNomfr = $this->ecoleNomfr;

        $phone = $code . $recipientPhone;
       $studentTitle = ($studentGender == 1) ? 'il' : 'elle';

       /*
               Votre enfant est absent ce matin le ........  
               Si vous avez une raison pour cette absence, merci de nous transmettre les informations

       */
 
       $messageDataFR = "Bonjour,

Votre enfant  $studentNamefr,  est absent ce matin le $date -  $time. 
       
Si vous avez une raison pour cette absence, merci de nous transmettre les informations
       
*$ecoleNomfr*";

        $messageDataAR = "مرحبًا،

        طفلك، $studentName, غائب هذا الصباح في $date - $time. إذا كان لديك سبب لغيابه، فالرجاء تزويدنا بالمعلومات.
        
*$ecoleNom*";

        $msgar = $this->sendCurlRequest($phone, $messageDataAR);
        $msgfr = $this->sendCurlRequest($phone, $messageDataFR);

        if ($msgar or $msgfr) {
            return 1;
        } else {
            return 0;
        }
 
     }

     public function parent($nom,$nomfr,$sex,$recipientPhone,$wh,$code,$pass) 
     {
 
         $phone = $code . $wh;

         $ecoleNom = $this->ecoleNom;
         $ecoleNomfr = $this->ecoleNomfr;
 
  
          $mrpr = ($sex == 1) ? 'السيد' : 'السيدة';
          $mrprfr = ($sex == 1) ? 'M.' : 'Mme';
  
          $messageBodyAr = "$mrpr $nom.

نرحب بكم بحرارة في مدرستنا! نشعر بسعادة كبيرة بانضمامكم إلى مجتمعنا التعليمي. نود أن نشكركم على اختياركم لمدرستنا لتعليم ورعاية طفلكم.
          
نحن ملتزمون بتوفير بيئة تعليمية آمنة ومحفزة لطفلكم، ونسعى جاهدين لتقديم أفضل تعليم واهتمام لهم. نحن مستعدون للتعاون معكم وتلبية احتياجات طفلكم بأفضل طريقة ممكنة.
          
إذا كان لديكم أي استفسارات أو احتياجات خاصة، فلا تترددوا في التواصل معنا. نحن هنا لمساعدتكم ودعمكم في رحلة تعليم طفلكم.
          
          
مع أطيب التحيات،

*$ecoleNom*";
  
          $messageBodyFr = "$mrprfr $nomfr.
 
Nous vous souhaitons la bienvenue dans notre école! Nous sommes ravis de vous accueillir dans notre communauté éducative. Nous tenons à vous remercier d'avoir choisi notre école pour l'éducation et les soins de votre enfant.

Nous nous engageons à fournir un environnement d'apprentissage sûr et stimulant pour votre enfant, et nous nous efforçons de leur offrir la meilleure éducation et les meilleurs soins. Nous sommes prêts à collaborer avec vous et à répondre aux besoins de votre enfant de la meilleure façon possible.

Si vous avez des questions ou des besoins particuliers, n'hésitez pas à nous contacter. Nous sommes là pour vous aider et vous soutenir dans le voyage éducatif de votre enfant.

  
  Cordialement,

  *$ecoleNomfr*";


  
  $web = $this->site; 
 
          $arr = [];
  
          $arr[] = $this->sendCurlRequest($phone, $messageBodyAr);
 
          $arr[] = $this->sendCurlRequest($phone, $messageBodyFr);
          $arr[] = $this->sendCurlRequest($phone, $web);
          $arr[] = $this->sendCurlRequest($phone, $recipientPhone);
          $arr[] = $this->sendCurlRequest($phone, $pass);
  
          if (in_array(true, $arr)) {
             return 1;
          } else {
              return 0;
          }
  
  
  
  
      }
 
    
    




}