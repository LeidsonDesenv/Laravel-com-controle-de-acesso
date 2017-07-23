
<div class="btn-group btn-group-justified" role="group" aria-label="Opções">
                   <div class="btn-group" role="group">
                        <a  href="{{url('/home')}}" role="button"class=" btn btn-lg btn-group btn-default" >
                                Home
                        </a>
                  </div>
                  <div class="btn-group" role="group">
                        <a href="allusers" role="button" class=" btn btn-lg btn-group btn-primary" >                                
                            Usuários
                        </a>
                  </div>
                   <div class="btn-group" role="group">
                        <a  href="notices/{{auth()->user()->id}}"  role="button" class=" btn  btn-lg btn-group btn-primary" >
                                Notícias
                        </a>
                  </div>
                   <div class="btn-group" role="group">
                        <a  href="allroles" role="button" class=" btn btn-lg btn-group btn-primary" >
                                Papeis
                        </a>
                  </div>
                   <div class="btn-group" role="group">
                        <a  href="allpermission" role="button"class=" btn btn-lg btn-group btn-primary" >
                                Permissões
                        </a>
                  </div>
              </div> 