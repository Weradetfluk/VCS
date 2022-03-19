TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `update_cho_score_use_point` \nAFTER INSERT ON `vcs_history_vote` \nFOR EACH ROW \nBEGIN \nUPDATE vcs_user \nSET vcs_user.use_point = vcs_user.use_point - new.his_score\nWHERE vcs_user.use_id = new.his_use_id;\n\nUPDATE vcs_choice_vote \nSET vcs_choice_vote.cho_score = vcs_choice_vote.cho_score + new.his_score \nWHERE vcs_choice_vote.cho_id = new.his_cho_id;\nEND'
sql_modes=524288
definers='root@localhost'
client_cs_names='latin1'
connection_cl_names='latin1_swedish_ci'
db_cl_names='latin1_swedish_ci'
created=164770703559
