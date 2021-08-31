<?php
echo '<dl>
                        <dt>
                          <label for="user"></label></dt>
                        <dd><input type="text" name="nro_reserva" id="nro_reserva" size="40" value="'.$_POST['nro_reserva'].'"  required placeholder="'.utf8_encode(NRO_RESERVA).'"/></dd>
                    </dl>
                    <dl>
                        <dt>
                          <label for="user"></label></dt>
                        <dd><input type="text" name="nombre" id="nombre" size="40" value="'.$_POST['nombre'].'" required placeholder="'.utf8_encode(NOMBRE).'"/></dd>
                        
                    </dl>
                    <dl>
                        <dt>
                          <label for="user"></label></dt>
                        <dd><input type="text" name="apellido" id="apellido" size="40" value="'.$_POST['apellido'].'" required placeholder="'.utf8_encode(APELLIDO).'"/></dd>
                        
                    </dl>
                    
                    <dl>
                        <dt><label></label></dt>
                        
                    </dl>
                    
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="'.ENTRAR.'" />
                     </dl>';