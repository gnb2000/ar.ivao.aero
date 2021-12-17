const Discord = require('discord.js');
const mysql = require('mysql');
const bot = new Discord.Client();

/*bot.on('ready', function()
{
	let guild = bot.guilds.first();
	let usuario = bot.users.cache.find('username', '{{$usuario}}');
	let member = guild.members.find('user', usuario); 

	if(member != null)
	{
		member.setRoles({!! $rolesString !!});
		member.setNickname({!! $user->name !!} + ' ' + ({!! $user->surname !!} + ' | ' + {{$user->vid}});
		alert('Permisos Discord y Nickname actualizados.');
	}
	else alert('Usuario no encontrado.');
}); */


bot.on('guildMemberAdd', member =>
{
       member.send(
       				'Bienvenido a IVAO Argentina, ' + member.user.username + '!\n' +
       				'Como establece la normativa, debo configurar tus permisos y tu nickname.\n' +
       				'Para ello, escribe en esta conversación el comando !registrar seguido de tu VID (Por ejemplo, !registrar 123456). Tras ello, tendrás acceso a nuestro servidor como corresponda.\n\n' +
       				'En nombre del staff de IVAO Argentina, te mando un cordial saludo,\n' +
       				'IVAO AR Bot'
       			);
});

bot.on('message', message =>
{
	var prefix = '!registrar';

	if((!message.content.startsWith(prefix) && !message.content.startsWith('!userinfo')) || message.author.bot) return;
	else if(message.content.startsWith('!userinfo'))
	{
		message.reply('Your username: ' + message.author.username +'\nYour ID: ' + message.author.id);

		/*let guild = bot.guilds.first();
		let usuario = bot.users.fetch(message.author.id);
		let member = guild.members.fetch(usuario);

		let memberRoles = [];
		memberRoles.push('526539517944135692');
		memberRoles.push('526541823162843166');
		member.roles.set(memberRoles); */


	}
	else
	{
		const args = message.content.slice(prefix.length).trim().split(/ +/);
		const command = args.shift().toLowerCase(); message.reply(args[0]);

		if (!args.length) return message.reply('No proporcionaste tu VID, ' + message.author.username + '!' + args);
		else
		{
			let guild = bot.guilds.first();
			let usuario = bot.users.fetch(message.author.id);
			let member = guild.members.fetch(usuario);

			var vid = args[0];
			var name, surname, va_member_ids;
			var isStaff, departamentos;
			var memberRoles = [];

			var connection = mysql.createConnection
			({
				host: 'localhost',
				user: 'ar-web',
				password: '5CgbgiAn@1b1Gvuf',
				database: 'ivao-ar-plesk_web'
			});
			connection.connect();

			connection.query('SELECT name, username, vid, va_member_ids FROM users WHERE vid = ' + vid, function (e, miembros, f)
			{
				if(error) message.reply(error);
				else
				{
					va_member_ids = miembros[0].va_member_ids;
					name = miembros[0].name;
					surname = miembros[0].surname;
				}
			});
			connection.query('SELECT department FROM staff_members WHERE vid = ' + vid, function (e, dptos, f)
			{
				if(error) throw error;
				else
				{
					isStaff = dptos.length > 0;
					departamentos = dptos;
				}
			});

			connection.end();

			if(VaMember != '')
            {
                var lista = VaMember.split(':');
                var SOGs = new Array('17673', '19757', '19758', '19849');
                var VAs = new Array('7100', '19749', '19856', '20872', '19786', '20961');
                
                for(var i = 0; i < SOGs.length; i++)
                {
                    if(lista.includes(SOGs[i]))
                    {
                        memberRoles.push('527046222763130900');
                        break;
                    }
                }
                for(var i = 0; i < VAs.length; i++)
                {
                    if(lista.includes(VAs[i]))
                    {
                        memberRoles.push('527045296388308993');
                        break;
                    }
                }
            }

            if(isStaff)
            {
                memberRoles.push('526539659916869642');
                
                for(var i = 0; i < departamentos.length; i++)
                {
                    if(departamentos[i].department == 'ATC' || departamentos[i].department == 'FIR') memberRoles.push('526541992377843722');
                    if(departamentos[i].department == 'WEB') memberRoles.push('419258342754484226');
                    if(departamentos[i].department == 'EVENT') memberRoles.push('526539517944135692');
                    if(departamentos[i].department == 'FLIGHT') memberRoles.push('526541823162843166');
                    if(departamentos[i].department == 'MEMBER') memberRoles.push('419258234369605642');
                    if(departamentos[i].department == 'PRD') memberRoles.push('526538581007794191');
                    if(departamentos[i].department == 'SO') memberRoles.push('526541075850985483');
                    if(departamentos[i].department == 'TRAINING') memberRoles.push('419258011026980864');
                }
            }
            else  memberRoles.push('419258234369605642');

			member.setNickname(rows[0].name + ' ' + rows[0].surname + ' | ' + vid);
			member.roles.set(memberRoles);

			return message.reply(
								'¡Felicitaciones! Ya eres miembro de nuestro servidor.\n' +
								'De nuevo, te doy la bienvenida al servidor de IVAO Argentina.\n\n' +
								'Un cordial saludo,\n' +
								'IVAO AR Bot'
			);

		}
	}
});


bot.login('NTI3ODI3MDU1MTMyMjc4Nzg0.DwZizA.XA8MMbSn6pnaPCD0J-94c7YpMLU');