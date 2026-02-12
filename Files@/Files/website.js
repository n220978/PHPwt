const brandName="Queen's Wear";
const brandTagline="Elegance Redefined";
const supportNumber="+1-800-555-1234";
let selectedColor="";
let loginStatus=false;
let ratingss=0;
// let username=prompt("Please enter your name: ");
join();



let brand = {
    name: "Queen’s Wear",
    rating: 4.5,
    support: "+91 98765 43210",
    themeColor: "goldenrod",
    ChangeThemeColor:function(newColor){
        this.themeColor=newColor;
    }
};
// console.log(brand);
// let newRating=prompt(`rating of our website..`);
// brand.rating=newRating;
// brand["support"]="+1-800-555-6789";
// console.log("Welcome to "+brand.name+" - "+brandTagline);
// console.log("Customer Support: "+brand.support);
// console.log("Website Rating: "+brand.rating+" stars");  
// brandName="my wear";--->error Assignment to constant variable
// const brandName="my wear"; --->error
// let selectedColor="black";-->error
function anchortag(element){
    selectedColor=element.innerText;
    console.log("You selected the color: "+selectedColor);
    // const brandName="my wear";
    // console.log(brandName);
//     let selectedColor="black";
//     console.log("Inside function, selected color is: "+selectedColor);--->STILL getting ERROR
}

function login(){
    loginStatus=true;
    document.getElementsByClassName("span-login")[0].innerText="Logout";
    alert("you are being redirected to the login page.");
    console.log("login function executed")
    
}

function showpNow(){
    document.write("do u want to shop now?");
}
function names(){
    let username=document.getElementById("username").value;
    console.log(username);
}

function ratings(){
    // ratingss=prompt("Please rate our website from 1 to 5 starts : ");
    // if(ratingss<1 || ratingss>5){
        // alert("Invalid rating! Please enter a number between 1 and 5.");
        // return;
    }
    // alert("Thank you for rating us "+ratingss+" stars!");
    
// }
function join(){
    let name=document.getElementsByClassName("footer-input")[0].value;
    if (name==""){
        document.getElementById("NEW").innerText=username+"!! Here are the latest trends for you...";
    }
    else{
        document.getElementById("NEW").innerText=name+"!!, As you have logged in successfully, enjoy some sort of discount!";
    }
    

}
let initialQuantity = 1;
let basePrice = parseInt(document.getElementsByClassName("inc")[0].innerText);

function inc(input){
    let quantity = parseInt(input.value);

    if(initialQuantity == quantity){
        return;
    }
    else if(initialQuantity < quantity){
        document.getElementsByClassName("inc")[0].innerText = quantity * basePrice;
        initialQuantity = quantity;
    }
    else{
        document.getElementsByClassName("inc")[0].innerText = quantity * basePrice;
        initialQuantity = quantity;
    }
}


