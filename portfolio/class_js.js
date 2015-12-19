var isGirl=[];
        var isBoy=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];
        var girlList=["김고라니", "박고라니", "정고라니", "백고라니", "흑고라니", "생고라니", "국산고라니", "왜래고라니"];
        var boyList=["김왑", "정왑", "박왑", "최왑", "이왑", "장왑", "조왑", "남궁왑", "강왑", "신왑", "오왑", "유왑", "진왑", "문왑", "송왑", "성왑"];
        function setGirl(lastNum){
            var i;
            var flag=0;
            for(i=0; i<isGirl.length; i++){
                if(Number(lastNum) === isGirl[i]){
                    flag=1;
                }
            }
            if(isGirl.length < 8){
                if(flag==0){
                    upGirl(lastNum);
                }else{
                    downGirl(lastNum);
                }
            }else{
            }
            if(isGirl.length === 8){
                var b=confirm('확정하시겠습니까?');
                if(b==0){
                    allGirlDelete();
                }else{
                    isGirl.push(undefined);
                    isGirl.sort();
                    randomGirl();
                    sortBoy();
                    randomBoy();
                }
            }
        }
        
        function upGirl(lastNum){
            var selected=document.getElementById('td'+lastNum);
            selected.style.backgroundColor = "hotpink";
            isGirl.push(Number(lastNum));
            console.log('pushed in isGirl ='+ lastNum);
            isBoy[lastNum-1]=undefined;
        }
        
        function downGirl(lastNum){
            var i, popNum;
            var selected=document.getElementById('td'+lastNum);
            selected.style.backgroundColor = "white";
            for(i=0; i<isGirl.length; i++){
                if(Number(lastNum) === isGirl[i])
                    popNum = i;
            }
            console.log('popme : '+isGirl[popNum]);
            isGirl[popNum]=undefined;
            isGirl.sort();
            console.log('realpop : '+isGirl[isGirl.length-1]);
            isGirl.pop();
            isBoy[lastNum-1]=lastNum;
        }
        
        function allGirlDelete(){
            var i;
            for(i=1; i<=24; i++){
                document.getElementById('td'+String(i)).style.backgroundColor="white";
            }
            while(isGirl.length!=0){
                isGirl.pop();
                console.log('do pop.');
            }
            isBoy=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];
            console.log(isBoy);
        }
        
        function randomGirl(){
            var i, name, rand;
            for(i=0; i<girlList.length; i++){
                while(1){
                    rand=parseInt(Math.random()*8);
                    if(girlList[rand] != undefined){
                        name=girlList[rand];
                        console.log('getout : ' + name);
                        girlList[rand]=undefined;
                        break;
                    }
                }
                document.getElementById('td'+isGirl[i]).innerHTML=name;
            }
        }
        
        function randomBoy(){
            console.log(isBoy);
            var i, name, rand;
            for(i=0; i<boyList.length; i++){
                while(1){
                    rand=parseInt(Math.random()*16);
                    if(boyList[rand] != undefined){
                        name=boyList[rand];
                        console.log('getout : ' + name);
                        boyList[rand]=undefined;
                        break;
                    }
                }
                document.getElementById('td'+isBoy[i]).innerHTML=name;
                document.getElementById('td'+isBoy[i]).style.backgroundColor = "skyblue";
            }
        }
        
        function sortBoy(){
            isBoy.sort();
            while(isBoy[isBoy.length-1] == undefined){
                isBoy.pop();
            }
        }