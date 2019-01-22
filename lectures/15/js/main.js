var accInfo = {
    name : 'Adina Mudassar',
    amount : 100000,
    currency : 'PKRS',
    IBAN : 'PKN1234567899',
    deposit : function (e, v) {
        if (e.key === "Enter") {
            if(isNaN(v))
            {
                alert("Enter valid amount");
            }
            else
            {
                var a = parseInt(v);
                accInfo.amount += a;
                show(a);
            }


            /*let amt = document.getElementById('deposit-msg');
            amt.innerText*/
        }
    },
    withdraw : function (e,v){
        if (e.key === "Enter") {
            if(isNaN(v) || parseInt(v) > accInfo.amount  )
            {
                alert("Enter valid amount");
            }
            else
            {
                var a = parseInt(v);
                accInfo.amount -= a;
                show(a);
            }
        }
    }

};

assignValues();
function assignValues()
{

    //document.getElementById("balance").style.display = 'block';
    let title= document.getElementById("title");
    title.innerText=accInfo.name;

    let amount= document.getElementById("balance");
    amount.innerText=accInfo.amount;

    let currency= document.getElementById("currency");
    currency.innerText=accInfo.currency;

    let iban= document.getElementById("IBAN");
    iban.innerText=accInfo.IBAN;
}

function show(a) {
    var t = time
    var ul = document.createElement('ul');
    ul.classList.add("list-group");
    for(var i=0; i<a.length; i++){
        var li = document.createElement('li');
        li.innerHTML= '<li>'+ currentTime
        li.innerHTML  = '<li>' + a[i] + '</li>';

        li.classList.add("list-group-item");
        ul.appendChild(li);
    }
    document.getElementById('transaction-table').appendChild(ul);
}