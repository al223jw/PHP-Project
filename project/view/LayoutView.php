<?php

class LayoutView {
  public function render($isLoggedIn, $v, DateTimeView $dtv, RegisterView $rv, SchemeView $sv, BookView $bv) 
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
          
          <div class="container">' . $this->renderView($v, $rv, $sv, $bv) . $dtv->Show() . '
          </div>
        </body>
      </html>
    ';
    echo $html;
  }
  
  public function renderView($v, $rv, $sv, $bv)
  {
    if(isset($_GET["scheme"]))
    {
        return $sv->generateScheme();
    }
    else if(isset($_GET["register"]))
    {
        return $rv->RegisterLayout();
    }
    else if(isset($_GET["book"]))
    {
        return $bv->BookLayout();
    }
    else
    {
        return $v->response();
    }
  }

  private function renderIsLoggedIn($isLoggedIn)
  {
    if ($isLoggedIn)
    {
        return $this->renderOption() . '<h2>Logged in</h2>';
    }
    else 
    {
        return '<h2>Not logged in</h2>';
    }
  }
  
  private function renderOption()
  {
      if(isset($_GET["register"]) || isset($_GET["scheme"]))
      {
          return '<a href=?>Back to login</a>';
      }
      else
      {
          return '<a href=?register>Register</a></br>
                  <a href=?scheme>Scheme</a>';
                  
                  
      }
  }
}