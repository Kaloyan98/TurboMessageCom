<?php
?>

<tcm-message-section inline-template>
	<div class="section-message" v-if="isMessageSectionShown" v-cloak>
		<div class="section__head">
			<button type="button" class="btn">Settings</button>
		</div>

		<div class="section__body">
			<ul v-if="getMessages" class="messages">
				<li
				v-for="message, index in getMessages"
				:class="message.fromCurrentUser ? '' : 'reversed'"
				:key="index"
				>
					<div
					v-if="message.imageURL"
					class="avatar"
					:style="getImageStyle(message)"
					>

					</div>

					<p v-if="message.text" class="entry" v-text="message.text">
					</p>
				</li>
			</ul>
		</div>

		<div class="section__actions">
			<form action="?" class="send-message-form" @submit.prevent="sendMessage">
				<input v-model="textMessage" type="text" />

				<button type="submit" class="btn btn--small">
					Send
				</button>
			</form>
		</div>
	</div>
</tcm-message-section>