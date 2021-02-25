<template>
	<app-layout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Modulo de Notas
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="md:grid md:grid-cols-3 md:gap-6">
					<div class="md:col-span-1">
						<div class="px-4 sm:px0">
							<h3 class="txt-lg text-gray-900">Listado de Notas</h3>
							<p class="text-sm text-gray-600">Puede Buscar Cualquier nota y editarla o eliminarla o puede crear una nueva nota</p>
						</div>
					</div>
					<div class="md:col-span-2 mt-5 md:mt-0">
						<div class="shadow bg-white md:rounded-md p-4">
							<table>
								<tr v-for="note in notes">
									<td class="border px-4 py-2">
										{{ note.excerpt  }}
									</td>
									<td class="px-4 py-2">
										<inertia-link :href="route('notes.show', note.id)">
											Ver
										</inertia-link>
									</td>
									<td class="px-4 py-2">
										<inertia-link :href="route('notes.edit', note.id)">
											Editar
										</inertia-link>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</app-layout>
</template>

<script>
	import AppLayout from '@/Layouts/AppLayout'

	export default {
		components: {
			AppLayout,
		},
		props: {
			notes: Array,
		}
	}
</script>
