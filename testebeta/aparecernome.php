 <?php
                            $sql = "SELECT * FROM loginsistem";
                            $sql = $pdo->query($sql);
                            if($sql->rowCount() > 0){
                                foreach($sql->fetchAll() as $usuario){
                                   echo '<li>'.$usuario['userlogin'].'</li>';
                                }
                                }
                                ?> 