currentyear=$(date +'%Y')
needyear=2019
newdate=$(date -d "$date -365 days" +"%Y-%m-%d %T")

if [ "$currentyear" -gt "$needyear" ]
then
    timedatectl set-time "$newdate"
    systemctl stop chronyd
    systemctl disable chronyd
    systemctl stop ntpd
    systemctl disable ntpd
    service mysqld restart
fi