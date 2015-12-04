<?php

class LayoutView {
  public function render($isLoggedIn, $v, DateTimeView $dtv, RegisterView $rv,
                         SchemeView $sv, BookView $bv, NotificationView $nv, ApplyView $av, ShowApplicationView $sav, ApplyDAL $aDAL) 
  {
    $html = '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Tacoday!</h1>
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">' . $this->renderView($v, $rv, $sv, $bv, $nv, $av, $sav, $aDAL) . $dtv->Show() . '
          </div>
        </body>
      </html>
    ';
    echo $html;
  }
  
  public function renderView($v, $rv, $sv, $bv, $nv, $av, $sav, $aDAL)
  {
      if(isset($_GET["scheme"]))
      {
          return $sv->generateScheme($this);
      }
      else if(isset($_GET["notification"]))
      {
          return $nv->notifications();
      }
      else if(isset($_GET["apply"]))
      {
          return $av->ApplyLayout();
      }
      else if(isset($_GET["showapply"]))
      {
           return self::getHTMLShowApplications($sav->ShowApplications($aDAL));
      }
      else if(isset($_GET["register"]))
      {
          return $rv->RegisterLayout();
      }
      else if(isset($_GET["day"]) && in_array($_GET["day"],$sv->getDayArray()))
      {
          return $bv->BookLayout();
      }
      else
      {
          return $v->response();
      }
  }
  private function getHTMLShowApplications($applications){
    
    $ret = "";
    
    foreach($applications as $application)
    {
       $ret .= $application->getApplyName() . '<br/>' . $application->getApplyInfo() . '<br/>'; 
    }
    return $ret;
  }

  private function renderIsLoggedIn($isLoggedIn)
  {
      if ($isLoggedIn)
      {
          return $this->renderOption() . '<h2>Logged in</h2>';
      }
      else 
      {
          return '<h2>Not logged in</h2>' .
                 '<a href=?apply>Apply</a><br/>';
      }
  }
  
  private function renderOption()
  {
    $htmlLink = '';
      if(isset($_GET["register"]) || isset($_GET["scheme"]) || isset($_GET["showapply"]))
      {
          $htmlLink .= '<a href=?>Back to login</a>';
      }
      else
      {
        $htmlLink .= '<a href=?register>Register</a></br>
                      <a href=?scheme>Scheme</a></br>
                      <a href=?showapply>Show Applications</a>';
      }
      
      return $htmlLink;
  }
  
  public function isBookOrNotification()
  {
      if(isset($_GET[""]))
      {
          return '<a href=?day>Boka</a>';
      }
      return '<a href=?notification>Händelse</a>';
    
  }
}