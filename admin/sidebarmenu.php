                <a class="menuitem submenuheader" href="">Idiomas</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>banderas/editar.html">Editar Idiomas</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">Categorias</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>categorias/nueva.html">Nueva Categoria</a></li>
                    <li><a href="<?php echo $dir_raiz?>categorias/editar.html">Editar/Borrar Categoria</a></li>
                    </ul>
                </div>

                <a class="menuitem submenuheader" href="">Atractivos</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>atractivos/nueva.html">Nuevo Atractivo</a></li>
                    <li><a href="<?php echo $dir_raiz?>atractivos/editar.html">Editar Atractivo</a></li>
                    </ul>
                </div>
                
                                <a class="menuitem submenuheader" href="">FAQ</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>faq/nueva.html">Nueva Pregunta</a></li>
                    <li><a href="<?php echo $dir_raiz?>faq/editar.html">Editar Pregunta</a></li>
                    </ul>
                </div>
                
                
                                <a class="menuitem submenuheader" href="">Bloques</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>bloques/editar.html">Editar Bloques</a></li>
                    </ul>
                </div>
                
                                <a class="menuitem submenuheader" href="">Beneficios</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>beneficios/nueva.html">Nuevo Beneficio</a></li>
                    <li><a href="<?php echo $dir_raiz?>beneficios/editar.html">Editar Beneficio</a></li>
                    </ul>
                </div>
                
                
                                <a class="menuitem submenuheader" href="">Locales</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>locales/nueva.html">Nuevo Local</a></li>
                    <li><a href="<?php echo $dir_raiz?>locales/editar.html">Editar Local</a></li>
                    </ul>
                </div>
                                                <a class="menuitem submenuheader" href="">Slider Home</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>sliderhome/nueva.html">Nuevo Slider</a></li>
                    <li><a href="<?php echo $dir_raiz?>sliderhome/editar.html">Editar Slider</a></li>
                    </ul>
                </div> 
                
                               
               

                <a class="menuitem submenuheader" href="">Videos</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>videos/editar.html">ABM Videos</a></li>
                    </ul>
                </div> 
                <a class="menuitem submenuheader" href="">Slider 2</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>sliderhome2/nueva.html">Nuevo Slider</a></li>
                    <li><a href="<?php echo $dir_raiz?>sliderhome2/editar.html">Editar Slider</a></li>
                    </ul>
                </div> 
                <a class="menuitem submenuheader" href="">Tarjetas</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>tarjetas/nueva.html">Nueva Tarjeta</a></li>
                    <li><a href="<?php echo $dir_raiz?>tarjetas/editar.html">Editar Tarjeta</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="">Whatsapp</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>whatsapp/edit-1.html">Editar Whatsapp</a></li>
                    </ul>
                </div>
                <a class="menuitem submenuheader" href="<?php echo $dir_raiz?>encuestas/encuestas.html">Encuestas</a>
                
                <?php
				if($_SESSION['admin']=='1'){
					?>
				<a class="menuitem submenuheader" href="">Admin</a>
                <div class="submenu">
                    <ul>
                    <li><a href="<?php echo $dir_raiz?>user-nuevo.html">Nuevo User</a></li>
                    </ul>
                </div>
                    
                    <?php }?>