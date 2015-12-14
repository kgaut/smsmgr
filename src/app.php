<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints;
use Kgaut\BBF\NewsletterSubscriptionForm;


$app = require(__DIR__.'/bootstrap.php');

$app->get('/', function () use ($app)  {
  $lang = $app['session']->get('current_language');
  return $app->redirect('/'.$lang);
});

$app->match('/{lang}', function($lang,Request $request) use($app) {
  if (is_file(__DIR__ . '/locales/' . $lang.'.yml')) {
    $app['session']->set('current_language', $lang);
    $app['translator']->setLocale($lang);
  }
  else {
    $app->redirect('/');
    exit;
  }
  $form = NewsletterSubscriptionForm::getForm($app);
  $data = NewsletterSubscriptionForm::handleRequest($form,$app,$request);

  if(!$data) {
    return $app['twig']->render('page-home.twig', array('form'=>$form->createView()));
  }
  else {
    return $app['twig']->render('page-thanks.twig', array('data'=>$data));
  }
})->bind('front');
;

return $app;