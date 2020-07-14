window.addEventListener("DOMContentLoaded",function(eve){
   let sl = document.querySelectorAll('input[type="number"]');
   sl.forEach(item => {      
      document.getElementById(item.id).onchange=function(e){
         console.log(`id: ${e.target.id} - sl: ${e.target.value}`);
          let sluong = e.target.value;
          let tt= e.target.id.replace("sl","tt");
          let gia= e.target.id.replace("sl","gia");
          let id = e.target.id.replace("sl","");
          let index = e.target.getAttribute('data-key');
          //console.log('key:',e.target.getAttribute('data-key'));
          let dongia = document.getElementById(gia).innerText;
          document.getElementById(tt).innerHTML = parseInt(sluong) * parseInt(dongia);
          let url = "http://localhost/php-mvc-master/index.php?url=cart/updateCard/";
          let data = {
            'index':index,
            'soluong':parseInt(sluong)
          }
          $.post(url,{"data":data},function (res) {              
              let dulieu = JSON.parse(res);
              console.log('res:',dulieu.tongtien);
              document.getElementById("tongtien").innerText = "VNĐ " + dulieu.tongtien;
              document.getElementById("soluong").innerText = "SP " + dulieu.sltong;
              document.getElementById("thanhtien").innerText = "VNĐ " +dulieu.tongtien;
            
          });
        
      }
   })
   // https://owlcarousel2.github.io/OwlCarousel2/demos/responsive.html
   let spnb= document.querySelectorAll('.spnb');
   spnb.forEach((slug)=>{
         console.log('slug:',slug);
         let id = slug.id;
         document.getElementById(id).onclick = function(e){            
            e.preventDefault();
            console.log('id:',id);
            let url = `http://localhost/php-mvc-master/index.php?url=home/productApiArea/${id}/`;
            $.post(url,{"data":id},function (res) {              
               var d = $.parseJSON(res);
               console.log('res:',d);
               document.getElementById('product_area_right').innerHTML = d;
               $('.owl-carousel').owlCarousel({margin:10 , loop:true, items : 3 , nav : true ,autoplay:true,navText: [ '<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ]});             
           });            
            
         }
   })
   let remember = false;
   let remem = document.getElementById('remember');
   if(remem !== null){
      remem.onclick = function(e){
         remember = e.target.checked;
      }
   }
  
   let login = document.getElementById('dangnhap');
   if(login !== null){
   login.onclick = function (e) {
        e.preventDefault() ;
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;        
        //console.log(remember);     
        let url = "http://localhost/php-mvc-master/index.php?url=login/dangnhap/";
        //let url = "http://localhost/wp532/getLogin/";
        let data = {
            'username':username,
            'password':password,
            'remember' : remember
        }
        $.post(url,{data},function (res) {
            
            let account = JSON.parse(res);    
            if(account !== false){
               console.log('ok:',JSON.parse(res)); 
               window.location.href = "http://localhost/php-mvc-master/index.php";
            }          
             
        });            
              
       
   }
   }
   // Xữ lý click đăng ký
   let reg_remember = false;
   let reg_remem = document.getElementById('reg-remember');
   if(reg_remem !== null){
      reg_remem.onclick = function(e){
         reg_remember = e.target.checked;
      }
   }
   let register = document.getElementById('dangky');
   if(register !== null){
   register.onclick = function (e) {
        e.preventDefault() ;
        e.stopPropagation();
        let username = document.getElementById('reg-username').value;
        let email = document.getElementById('reg-email').value;
        let password = document.getElementById('reg-password').value;        

        let url = "http://localhost/php-mvc-master/index.php?url=login/dangky/";
        let data = {
            'username':username,
            'email':email,
            'password':password,
            'remember' : reg_remember
        }
        $.post(url,{"data":data},function (res) {
            console.log('ok:',res);           
  
        });            
              
       
   }
   }
},false);


 