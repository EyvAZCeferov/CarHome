function redirecturl(url,target="_self"){
    if(target=='_self')
        window.location.href=url;
    else
        window.open(url);
}
