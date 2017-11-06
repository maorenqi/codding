# 一句话查找PHP木马
* find ./ -name "*.php" |xargs egrep "phpspy|c99sh|milw0rm|eval\(gunerpress|eval\(base64_decoolcode|spider_bc"> /tmp/php.txt
* grep -r --include=*.php '[^a-z]eval($_POST' . > /tmp/eval.txt
* grep -r --include=*.php 'file_put_contents(.*$_POST\[.*\]);' . > /tmp/file_put_contents.txt
* find ./ -name "*.php" -type f -print0 | xargs -0 egrep "(phpspy|c99sh|milw0rm|eval\(gzuncompress\(base64_decoolcode|eval\(base64_decoolcode|spider_bc|gzinflate)" | awk -F: '{print $1}' | sort | uniq