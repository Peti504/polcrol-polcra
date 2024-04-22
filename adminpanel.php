<?php 
      $userdata = mysqli_query($adb, "
      SELECT * 
      FROM   user
      ORDER BY udatum
      ");
      $orderdata = mysqli_query($adb, "
      SELECT * 
      FROM   rendeles
      WHERE R_STATUSZ = 'Elbírálás alatt'
      ORDER BY R_DATE DESC
      ");
      $accorderdata = mysqli_query($adb, "
      SELECT * FROM rendeles 
      WHERE R_STATUSZ = 'Elfogadva'
      ORDER BY R_DATE DESC
      ");

      $denorderdata = mysqli_query($adb, "
      SELECT * FROM rendeles 
      WHERE R_STATUSZ = 'Elutasítva'
      ORDER BY R_DATE DESC
      ");

      if(isset($_REQUEST['accept'])){
        if(mysqli_query($adb, "
        UPDATE rendeles SET R_STATUSZ = 'Elfogadva' WHERE R_ID = '$_REQUEST[r_id]'
        ")){
            print'<script>
            alert("A rendles el lett fogadva")
            parent.location.href=parent.location.href
            </script>';
        }
        else print"<script>alert('Nem sikerult megcsinalni')";
      }

      if(isset($_REQUEST['decline'])){
        if(mysqli_query($adb, "
        UPDATE rendeles SET R_STATUSZ = 'Elutasítva' WHERE R_ID = '$_REQUEST[r_id]'
        ")){
            print'<script>
            alert("A rendeles el lett bírálva")
            parent.location.href=parent.location.href
            </script>';
        }
        else print"<script>alert('Nem sikerult megcsinalni')";
      }
?>


<h1>Adminpanel</h1>
<div class='keret'>

      <div class='belso_bal'>
            <form method="get"> 
                <input type="submit" name="users" class="button" value="Felhasznalok"                   />
                <br><br>
                <input type="submit" name="order" class="button" value="Elbírálás alatt lévő Rendelesek"/>
                <br><br>
                <input type="submit" name="accorder" class="button" value="Elfogadott Rendelesek"       />
                <br><br>
                <input type="submit" name="denorder" class="button" value="Elutasított Rendelesek"      />
                <input type="hidden" name="p" value="admin">
                
            </form>
      </div>

      <div class='belso_jobb' >
            

<?php
    if(isset($_GET['users'])) 
    { 
        print "<table style=width:100%>
            <tr>
                <th>Azonosító                 </th>
                <th>Felhasználónév            </th>
                <th>E-mail                    </th>
                <th>Regisztráció ideje        </th>
                <th>Hozzáférés                </th>
            </tr>";
        while( $userdatarow = mysqli_fetch_array( $userdata ) )
        {
        print "
        		<tr>
            		<td>$userdatarow[uid]          </td>
            		<td>$userdatarow[unev]         </td>
            		<td>$userdatarow[umail]        </td>
            		<td>$userdatarow[udatum]       </td>
				    <td>$userdatarow[ujog]         </td>
        		</tr>
        	";
          }
          print "</table>"; 
    }
    
    
    if(isset($_GET['order'])) 
    { 
        print "<table style=width:100%>
            <tr>
                <th>RendelesID            </th>
                <th>Rendelo Neve          </th>
                <th>Rendelo Email-e       </th>
                <th>Rendeles Mennyisege   </th>
                <th>Rendelt Konyv címe    </th>
                <th>Rendeles Datuma     </th>
                
                
                
            </tr>";
        while( $orderdatarow = mysqli_fetch_array( $orderdata ) )
        {
        print "
        		<tr>
            		<td>$orderdatarow[R_ID]               </td>
            		<td>$orderdatarow[RI_NEV]             </td>
            		<td>$orderdatarow[R_MAIL]             </td>
            		<td>$orderdatarow[R_MENNYISEG]        </td>
				    <td>$orderdatarow[RK_NEV]             </td>
                    <td>$orderdatarow[R_DATE]             </td>
                    <td>
                    <form action='' method='post'>
                        <input type='submit' name='accept' value='Elfogadás'  >
                        <input type='submit' name='decline' value='Elutasítás'>
                        <input type='hidden' name='r_id' value='$orderdatarow[R_ID]'>
                    </form>
                    </td>
        		</tr>
        	";
          }
          print "</table>"; 
    }

    if(isset($_GET['accorder'])) 
    { 
        print "<table style=width:100%>
            <tr>
                <th>RendelesID            </th>
                <th>Rendelo Neve          </th>
                <th>Rendelo Email-e       </th>
                <th>Rendeles Mennyisege   </th>
                <th>Rendelt Konyv címe    </th>
                <th>Rendeles Datuma     </th>
                
                
                
            </tr>";
        while( $accorderdatarow = mysqli_fetch_array( $accorderdata ) )
        {
        print "
        		<tr>
            		<td>$accorderdatarow[R_ID]               </td>
            		<td>$accorderdatarow[RI_NEV]             </td>
            		<td>$accorderdatarow[R_MAIL]             </td>
            		<td>$accorderdatarow[R_MENNYISEG]        </td>
				    <td>$accorderdatarow[RK_NEV]             </td>
                    <td>$accorderdatarow[R_DATE]             </td>
        		</tr>
        	";
          }
          print "</table>"; 
    }

    if(isset($_GET['denorder'])) 
    { 
        print "<table style=width:100%>
            <tr>
                <th>RendelesID            </th>
                <th>Rendelo Neve          </th>
                <th>Rendelo Email-e       </th>
                <th>Rendeles Mennyisege   </th>
                <th>Rendelt Konyv címe    </th>
                <th>Rendeles Datuma     </th>
                
                
                
            </tr>";
        while( $denorderdatarow = mysqli_fetch_array( $denorderdata ) )
        {
        print "
        		<tr>
            		<td>$denorderdatarow[R_ID]               </td>
            		<td>$denorderdatarow[RI_NEV]             </td>
            		<td>$denorderdatarow[R_MAIL]             </td>
            		<td>$denorderdatarow[R_MENNYISEG]        </td>
				    <td>$denorderdatarow[RK_NEV]             </td>
                    <td>$denorderdatarow[R_DATE]             </td>
        		</tr>
        	";
          }
          print "</table>"; 
    }
?> 

      </div>

</div>



