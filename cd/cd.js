while (count = readline().split(" ")) {
	jack = count[0];
	jill = count[1];
	if (jack == 0 && jill == 0) {
		break;
	}
	cd_num = 0;
	jack_ids = [];
	while (cd_num < jack) {
		jack_ids[cd_num] = parseInt(readline());
		cd_num++;
	}
	res = 0;
	cd_num = 0;
	i = 0;
	while (cd_num < jill) {
		jill_id = parseInt(readline());
		while (i < jack - 1 && jack_ids[i] < jill_id) {
			i++;
		}
		if (jack_ids[i] === jill_id) {
			res++;
		}
		cd_num++;
	}
	print(res+"\n");
}