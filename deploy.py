import paramiko
import os
import argparse
import logging

# Hardcoded parameters
host = "anditherobot.com"  # Update with your server's hostname or IP address
username = "ubuntu"  # SSH username
repo_dir = "/home/ubuntu/www/wordpress/wp-content/themes/bootscore"  # Path to the theme repository on the server
ssh_key_filepath = "/mnt/c/Users/expan/.ssh/id_rsa" # Updated path to your private SSH key


ef setup_logging():
    logging.basicConfig(
        format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
        level=logging.INFO
    )

def ssh_connect():
    client = paramiko.SSHClient()
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    key = paramiko.RSAKey.from_private_key_file(ssh_key_filepath)
    
    try:
        client.connect(host, username=username, pkey=key)
        logging.info("SSH connection established")
        return client
    except Exception as e:
        logging.error(f"Failed to connect via SSH: {e}")
        return None

def execute_commands(client, commands):
    for command in commands:
        try:
            stdin, stdout, stderr = client.exec_command(command)
            output = stdout.read().decode()
            error = stderr.read().decode()
            
            logging.info(f"Executing: {command}")
            logging.info(f"Output: {output}")
            if error:
                logging.error(f"Errors: {error}")
        except Exception as e:
            logging.error(f"Failed to execute command '{command}': {e}")

def ensure_log_file(client):
    log_file = os.path.join(repo_dir, 'logs', 'deploy.log')
    commands = [
        f"sudo touch {log_file}",
        f"sudo chown www-data:www-data {log_file}",
        f"sudo chmod 664 {log_file}"
    ]
    execute_commands(client, commands)

def deploy_pull(client):
    commands = [
        f"cd {repo_dir} && git fetch origin",
        f"cd {repo_dir} && git reset --hard origin/master",
        f"cd {repo_dir} && git pull",
    ]
    execute_commands(client, commands)

def deploy_full(client):
    commands = [
        f"cd {repo_dir} && git fetch origin",
        f"cd {repo_dir} && git reset --hard origin/master",
        f"cd {repo_dir} && git pull",
        f"cd {repo_dir} && mkdir -p logs",
        f"sudo chown -R {username}:{username} logs",
        f"sudo chmod -R 775 logs",
    ]
    execute_commands(client, commands)
    ensure_log_file(client)

def main():
    setup_logging()
    
    parser = argparse.ArgumentParser(description="Deploy WordPress theme.")
    parser.add_argument("--pull", action="store_true", help="Git pull and update the theme.")
    parser.add_argument("--full", action="store_true", help="Full deployment: pull updates, create dirs, set permissions.")
    
    args = parser.parse_args()
    
    if not (args.pull or args.full):
        parser.print_usage()
        return
    
    client = ssh_connect()
    if client is None:
        return
    
    if args.pull:
        deploy_pull(client)
    elif args.full:
        deploy_full(client)
    
    client.close()

if __name__ == "__main__":
    main()
