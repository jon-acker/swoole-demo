FROM percona:5.6.33

COPY dot_mylogin.cnf /home/mysql/.mylogin.cnf
RUN chmod 600 /home/mysql/.mylogin.cnf
RUN chown mysql:mysql /home/mysql/.mylogin.cnf

